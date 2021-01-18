<?php
    use app\models\User;

/* @var $this yii\web\View */

?>

<aside class="main-sidebar">

    <section class="sidebar">

        
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::getAlias('@web').'/images/logo.jpg'; ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
    

        <?php
            if (User::isAdmin()) {
                echo $this->render('_menu');
            }
            if (User::isInstansi()) {
                echo $this->render('_menu-instansi');
            }
            if (User::isDokter()) {
                echo $this->render('_menu-dokter');
            }
        ?>

    </section>

</aside>
