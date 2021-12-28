<?php 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 4;
$offset = $limit * ($page - 1);
$total_pages = ceil(Bid::countRow() / $limit);

$klas = Bid::getAllClassWithPagination($limit, $offset);
$output = '';
foreach ($klas as $elem) {
$output .= "<div class='card col-md-1' style='width: 18rem;'>
        <img src='images/grup.png' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'> {$elem["class"]}</h5>
            <p class='card-text'>{$elem["description"]}</p>
            <a href='index.php?action=bid-detail&class-id={$elem["id"]}'> Детально </a>
            <br>
            <a href='index.php?action=bids&class-id={$elem["id"]}&class-name={$elem["class"]}' class='btn btn-primary'>Записатися</a>
        </div>
    </div>";
}
if ($total_pages >= 1 && $page <= $total_pages && $page >= 1) {
    $output .= "<div id='pagination'>
    <nav aria-label='Page navigation example mt-5'>
    <ul class='pagination justify-content-center'>";
    for ($i = 1; $i <= $total_pages; $i++) :
    $output .= "<li class='page-item' ";
    if ($page == $i) {
    $output .= 'active';
    }
    $output .= "<a id='page-link' class='page-link' href='index.php?action=all-groups&page={$i}'>{$i}</a>";
    endfor;
    $output .= "</li>
            </ul>
            </nav>
            </div>";
}
echo $output;
?>