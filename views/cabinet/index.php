<?php include_once ROOT. '/views/layouts/header.php'; ?>
    <section>
        <div class="container">
            <div class="row">
                <h1>Кабінет користувача</h1>

                <h3>Доброго дня, <?php echo $user['name']; ?></h3>
                    <ul>
                        <li><a href="/cabinet/edit">Редагувати дані</a></li>
                        <li><a href="/user/history">Список покупок</a></li>
                    </ul>

            </div>
        </div>

    </section>

<?php include_once ROOT. '/views/layouts/footer.php'; ?>