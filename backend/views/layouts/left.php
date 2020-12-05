<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/images/avatar2.jpeg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Онлайн</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Управление', 'options' => ['class' => 'header']],
                    ['label' => 'Меню сайта', 'icon' => 'list', 'url' => ['/cms/menu/index']],
                    ['label' => 'Страницы', 'icon' => 'font', 'url' => ['/cms/pages/index']],
                    ['label' => 'Деревья', 'icon' => 'tree', 'url' => ['/trees/index']],
                    ['label' => 'Род', 'icon' => 'th-list', 'url' => ['/genus/index']],
                    ['label' => 'Рисунок', 'icon' => 'image', 'url' => ['/tree-photos/index']],
//                    ['label' => 'Рубрики', 'icon' => 'th-list', 'url' => ['/cms/article-categories/index']],
//                    ['label' => 'Статьи', 'icon' => 'edit', 'url' => ['/cms/articles/index']],
//                    ['label' => '-', 'url' => ['#']],
//                    ['label' => 'Contacts', 'icon' => 'address-book', 'url' => ['/contacts/index']],
//                    ['label' => 'Галерея(Example)', 'icon' => 'image', 'url' => ['/slider/slides/index?slug=gallery']],
//                    ['label' => 'Слайдер(Example)', 'icon' => 'sliders', 'url' => ['/slider/slides/index?slug=slider']],
//                    ['label' => 'Теги слайдов', 'icon' => 'tags', 'url' => ['/slider/tags/index']],
//                    ['label' => 'Категории слайдов', 'icon' => 'users', 'url' => ['/slider/categories']],
                ],
            ]
        ) ?>
    </section>
</aside>
