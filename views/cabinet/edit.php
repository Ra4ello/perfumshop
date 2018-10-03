<?php include_once ROOT. '/views/layouts/header.php'; ?>
    <section>
        <div class="container">
            <div class="row">


                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if($result): ?>
                        <p>Успішно відредаговано</p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                        <div class="signup-form">
                            <h2>Редагування даних</h2>
                            <form action="#" method="post">
                                <input type="text" name="name" placeholder="І'мя" value="<?php echo $name; ?>">
                                <input type="" name="password" placeholder="Пароль" value="<?php echo $password; ?>">
                                <input type="submit" name="submit" class="btn btn-default" value="Зберегти">
                            </form>
                        </div>
                    <?php endif;?>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>

<?php include_once ROOT. '/views/layouts/footer.php'; ?>
