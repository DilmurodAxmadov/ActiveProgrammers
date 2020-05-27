<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Manage', 'options' => ['class' => 'header']],
                    ['label' => 'Menus', 'icon' => 'list', 'url' => ['/cms/menu/index']],
                    ['label' => 'Sliders', 'icon' => 'sliders', 'url' => ['/slider/slides/index?slug=slider']],
                    ['label' => 'Contacts', 'icon' => 'address-book', 'url' => ['/contacts/index']],
                    ['label' => 'Partners', 'icon' => 'users', 'url' => ['/slider/slides/index?slug=partners']],
                    ['label' => 'Gallery Category', 'icon' => 'photo', 'url' => '#', 'items' => [
                        ['label' => 'Gallery Category', 'icon' => 'photo', 'url' => ['/slider/tags/index']],
                        ['label' => 'Galleries', 'icon' => 'photo', 'url' => ['/slider/slides/index?slug=gallery']],
                    ]],
                    ['label' => 'Pages', 'icon' => 'file-photo-o', 'url' => ['/cms/pages/index']],
                    ['label' => 'Article Categories', 'icon' => 'file-code-o', 'url' => '#', 'items' => [
                        ['label' => 'Article Categories', 'icon' => 'file-code-o', 'url' => ['/cms/article-categories/index']],
                        ['label' => 'Articles', 'icon' => 'file-code-o', 'url' => ['/cms/articles/index']],
                    ]],
                ],
            ]
        ) ?>
    </section>
</aside>
