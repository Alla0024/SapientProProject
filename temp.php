<?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;
        $offset = $limit * ($page - 1);
        $total_pages = ceil(Bid::countRow() / $limit);

        $klas = Bid::getAllClassWithPagination($limit, $offset);
        foreach ($klas as $elem) {
        ?>
            <div class="card col-md-1" style="width: 18rem;">
                <img src="images/grup.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <?= $elem['class'] ?> </h5>
                    <p class="card-text"> <?= $elem['description'] ?> </p>
                    <a href="index.php?action=bid-detail&class-id=<?= $elem['id'] ?>"> Детально </a>
                    <br>
                    <a href="index.php?action=bids&class-id=<?= $elem['id'] ?>&class-name=<?= $elem['class'] ?>" class="btn btn-primary">Записатися</a>
                </div>
            </div>
        <?php }
        if ($total_pages >= 1 && $page <= $total_pages && $page >= 1) {
        ?>
            <div id="pagination">
                <nav aria-label="Page navigation example mt-5">
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <li class="page-item <?php if ($page == $i) {
                                                        echo 'active';
                                                    } ?>">
                                <a id="page-link" class="page-link" href="index.php?action=all-groups&page=<?= $i; ?>"> <?= $i; ?> </a>
                            </li>
                    <?php endfor;
                    } ?>
                    </ul>
                </nav>
            </div>
    </div>




    <!-- AJAX -->
    <script>
        $(document).ready(function() {
            function loadTable(page_no) {
                $.ajax({
                    url: "config/ajax-pagination.php",
                    type: "POST",
                    data: {
                        page: page_no
                    },
                    success: fucntion(data) 5{
                        $("#card").html(data)
                    }
                });
            }
            loadTable();
            $(document).on("click", "#pagination a", function(e) {
                e.preventDefault();
                var page_id = $(this).attr("id")
                loadTable(page_id);

            });
        });
    </script>

<a class="nav__link" href="index.php?action=grups">Керування заявками</a>

ОНЛАЙН ШКОЛА МАТЕМАТИКИ
Використовуються практичні методи навчання. Вони передбачають різні види діяльності. Вправи — багаторазове повторення певних дій або видів діяльності з метою їх засвоєння, яке спирається на розуміння і супроводжується свідомим контролем і коригуванням. Використовую такі види вправ: підготовчі — готують учнів до сприйняття нових знань і способів їх застосування на практиці; вступні — сприяють засвоєнню нового матеріалу на основі розрізнення споріднених понять і дій; пробні — перші завдання на застосування щойно засвоєних знань; тренувальні — набуття учнями навичок у стандартних умовах (за зразком, інструкцією, завданням); творчі — за змістом і методами виконання наближаються до реальних життєвих ситуацій; контрольні — переважно навчальні (письмові, графічні, практичні вправи).