<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\BDregister;
use frontend\models\TaskProblem;
use frontend\models\Chatlog;
use frontend\models\formTask;
use frontend\models\EditTask;
use yii\caching\Cache;
use yii\caching\FileCache;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }



    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
      

            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    public function actionRegistration(){ // Мой костыль
        $model = new SignupForm();
       $Request= Yii::$app->request->post();
        /// Я пробовал через конструктор "Yii::$app->request->post('name');"
        // Что отказыветься хоть что-то делать, приходиться через костыли
        $email= Yii::$app->request->post('email');
        $password= Yii::$app->request->post('password');
        $user = $Request["SignupForm"]["username"];
        $email = $Request["SignupForm"]["email"];
        $password = $Request["SignupForm"]["password"];

        //////////////////// Работа с БД

        $registration = new BDregister();        
        $registration->username = $user;
        $registration->email = $email;
        $registration->password = $password;
        $registration->save();
        

        
        return $this->render('signup', [
            'model' => $model,
            'user'=>$user,
            'email'=>$email,
            'password'=>$password,
        ]);
    }
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
    function actionHello(){

        return $this->render('hello');   
    }
    //////// Работа с таском
    function actionTask(){  //Tasktracker

if(!Yii::$app->user->isGuest){  // Если клиент нам не нравиться
return $this->render('index');  // Выгоняем его
}



     $Task = (new \yii\db\Query())
    ->select(['id', 'username','nameTask','manualTask','priority','ProjectStatus','idProject'])
    ->from('task','`project')->where('task.idProject' == 'project.id')
    ->limit(10)
    ->all(); // Попробовал так выводить, мне понравилось

    ///Запросимка пост
    $reqvest = Yii::$app->request->post();
    $id = $reqvest['SignupForm']['id']; // Вясняю ид проэкта


    ////
    $ProjectJSON = (new \yii\db\Query())
    ->select(['id', 'nameProject','manualProject','priority','ProjectStatus','ProjectJSON'])
    ->from('project')
    ->where(['id' => $id])
    ->limit(1)
    ->all();


/////Танцы с бубном ради чата




    ////Кеширование глобального общщего запроса
    if(!isset($cashe)){
    global $cashe; // Global - понимаю очень сильный "Моральный" косяк но иначе я не знаю как
    $cashe=Yii::$app->db->cache(function () {
      return Yii::$app->db->createCommand('SELECT * FROM `task`')->queryAll();
      });
    
    $FileCashe  = fopen("cashe.txt","w+");
    $LocalCashe = $cashe;
    $FileWrite = json_encode($LocalCashe);
   $cashe = $FileWrite;

   
       

}

    return $this->render('task',['Task'=>$Task,
                                'cashe'=>$cashe]); 

          
    }
    function actionConcretokaltask($id){
        $Task = (new \yii\db\Query())
    ->select(['id', 'TaskName','TaskManual','UserName','dataCreate','dataUpdate'])
    ->from('taskproblem')
    ->limit(10)
    ->where('id=:id',[':id'=>$id])
    ->all();
    $formT = new formTask;
   $CreateNewTask = Yii::$app->request->post();
      

   
   $formT->username=$CreateNewTask["formTask"]["username"];
    $formT->username=$CreateNewTask["formTask"]["username"];
    $formT->nameTask=$CreateNewTask["formTask"]["nameTask"];
    $formT->manualTask=$CreateNewTask["formTask"]["manualTask"];
    $formT->priority=$CreateNewTask["formTask"]["priority"];
    $formT->ProjectStatus=$CreateNewTask["formTask"]["ProjectStatus"];
    $formT->idProject=$CreateNewTask["formTask"]["inProgres"];
    
 $CreateNewTask=$CreateNewTask["formTask"]["username"];



    return $this->render('Concretokaltask',['Task'=>$Task,
                                            'formT'=>$formT,
                                            'CreateNewTask'=>$CreateNewTask]);
    }
    public function actionEdittask($id){ //Вот когда я 2жды заиспользовал Id то задумался, может логически я делаю что-то не так.
        if(is_null($EditTask)){
      

       $EditTask = new EditTask();
 




            $Request= Yii::$app->request->post();
            $TaskName = $Request["SignupForm"]["TaskName"];
            $TaskManual = $Request["SignupForm"]["TaskManual"];
            $UserName = $Request["SignupForm"]["UserName"];
            $dataUpdate = $Request["SignupForm"]["dataUpdate"];
          Yii::$app->db->createCommand()->update('taskproblem', [
           
            'TaskName'=>$TaskName,
            'TaskManual'=>$TaskManual,
            'UserName'=>$UserName,
            'dataUpdate'=>$dataUpdate,


        ], 'id=:id',[':id'=>$id])->execute();
        };
      
    $MyTask =  (new \yii\db\Query())
    ->select(['id','username','nameTask','manualTask','priority','ProjectStatus','idProject' ])
    ->from('task')
    ->where(['id' => $id])
    ->limit(1)
    ->all();


   
    return $this->render('edittask',['EditTask'=>$EditTask,
                                    'MyTask'=>$MyTask]);

    }
    public function actionProject($id){ // Обработка проэкта
//https://p0vidl0.info/yii2-razbiraemsya-s-gridview.html
        // Остлась добить "Проэкт"
        // Подгодтовить вид и упихнть его в GRID

$ProjectJSON = (new \yii\db\Query())
    ->select(['id', 'nameProject','manualProject','priority','ProjectStatus','ProjectJSON'])
    ->from('project')
    ->where(['id' => $id])
    ->limit(1)
    ->all();
    $poket =  (new \yii\db\Query())
    ->select(['id','ProjectJSON'])
    ->from('project')
    ->where(['id' => $id])
    ->limit(1)
    ->all();
//$ProjectJSONdecode = json_decode($poket,true); //Вот тут я долго думал, может изначально принимать масив или нет.
// В итоге понял что "Проэкт может быть описан и большей глубинной" чем я того ожидаю
// По сему и выбрал JSON
   
$ProjectJSONdecode = $poket;

return $this->render('project',[
    'id'=>$id,
'ProjectJSON'=>$ProjectJSON,
'ProjectJSONdecode'=>$ProjectJSONdecode,
]);
    }
}





