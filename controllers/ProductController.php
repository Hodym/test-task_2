<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CommentForm;
use app\models\Feedback;
use yii\data\Pagination;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
            'sort' => [
                'attributes' => [
                    'id',
                    'name' => [
                        'asc' => ['id' => SORT_ASC],
                        'desc' => ['id' => SORT_DESC],
                        'default' => SORT_DESC,
                    ],
                    'description' => [
                        'asc' => ['id' => SORT_ASC],
                        'desc' => ['id' => SORT_DESC],
                        'default' => SORT_DESC,
                    ],
                    'category_id',
                    'filename',
                    'price',
                ],
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $commentForm = new CommentForm();

        $comment = new Feedback();
        if ($commentForm->load(Yii::$app->request->post())) {
            $comment->product_id = $id;
            $comment->username = $commentForm->username;
            $comment->email = $commentForm->email;
            $comment->reviews = $commentForm->reviews;

            if ($comment->save()) {
                Yii::$app->session->setFlash('success', Yii::t('control', '{username} your comment has been added!', ['username' => $comment->username,]));
                return $this->refresh();
            }
        }
        
        $query = Feedback::find()->where(['product_id' => $id])->orderBy(['id' => SORT_DESC]);      
        //$comments = $product->comments;
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $comments = $query->offset($pages->offset)->limit($pages->limit)->all();

        if (!Yii::$app->user->isGuest) {
            $userData = [];
            $userData['name'] = Yii::$app->user->identity->username;
            $userData['email'] = Yii::$app->user->identity->email;
        } else {
            $userData['name'] = '';
            $userData['email'] = '';
        }
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'comments' => $comments, 
            'commentForm' => $commentForm,
            'pages' => $pages,
            'userData' => $userData,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */  
    protected function findModel($id)
    {
        if (($model = Product::find()->where(['id' => $id])->multilingual()->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('control', 'The requested page does not exist.'));
    }
}