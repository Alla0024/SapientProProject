<div class="login">
    <div class="container3">
        <div class="preg2">
            <form action="" method="POST">

                <div class="dws-input">
                    <select class="test" name="class">

                        <option value="сlass">Клас</option>
                        <?php
                        $klas = json_decode(file_get_contents(__DIR__ . "/class.json"), true);
                        foreach ($klas as $elem) {
                        ?> <option value="<?= $elem['code'] ?>"><?= $elem['name'] ?></option> <?php
                                                                                            }

                                                                                                ?>
                    </select>
                </div>
                <div class="dws-input">
                    <select class="test" name="subject">

                        <option value="subject">Предмет</option>
                        <?php
                        $sub = json_decode(file_get_contents(__DIR__ . "/subject.json"), true);
                        foreach ($sub as $elem) {
                        ?> <option value="<?= $elem['code'] ?>"><?= $elem['name'] ?></option> <?php
                                                                                            }

                                                                                                ?>
                    </select>
                </div>

                <div class="dws-input">
                    <select class="test" name="subject">

                        <option value="formstady">Форма занять</option>
                        <?php
                        $formstady = json_decode(file_get_contents(__DIR__ . "/formstady.json"), true);
                        foreach ($formstady as $elem) {
                        ?> <option value="<?= $elem['code'] ?>"><?= $elem['name'] ?></option> <?php
                                                                                            }

                                                                                                ?>
                    </select>
                </div>
                <div class="dws-input">
                    <input type="text" name="time" placeholder="Бажанні дні та час занять">
                </div>

                <div class="dws-input">
                    <input type="password" name="other" placeholder="Інші побажання">
                </div>

                <input class="dws-submit" type="submit" name="submit" value="Зберегти">
                <br />
            </form>
        </div>
    </div>