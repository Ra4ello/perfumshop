<?php include_once ROOT. '/views/layouts/header.php'; ?>
    <section>
        <div class="container">
            <div class="row">


                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if($result):?>
                        <p>Повідомлення відправленно! Ми відповімо вам у найкоротший термін</p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                        <div class="signup-form">
                            <h2>Зворотній звязок</h2>
                            <h5>Є запитання? Напишіть нам!</h5>
                            <br />
                            <form action="#" method="post">
                                <p>Ваш поштовий ящик</p>
                                <input type="text" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>">
                                <p>Повідомлення</p>
                                <input type="text" name="userText" placeholder="Повідомлення" value="<?php echo $userText; ?>">
                                <br />
                                <input type="submit" name="submit" class="btn btn-default" value="Відправити">
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