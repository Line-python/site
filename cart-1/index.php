<?php
error_reporting(-1);
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';
$products = get_products();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="assets/css/main.css">

    <title>Hello, world!</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="index.html">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Гитары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Гитарное оборудование</a>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart-modal">
                    Корзина <span class="badge badge-light">3</span>
                </button>
            </li>
        </ul>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="wrapper mt-5">
    <div class="container">
        <div class="row">

            <div class="product-cards mb-5">

                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <div class="offer">
                                <?php if ($product['hit']): ?>
                                    <div class="offer-hit">Hit</div>
                                <?php endif; ?>
                                <?php if ($product['sale']): ?>
                                    <div class="offer-sale">Sale</div>
                                <?php endif; ?>
                            </div>
                            <div class="card-thumb">
                                <a href="#"><img src="img/<?= $product['img'] ?>" alt="<?= $product['title'] ?>"></a>
                            </div>
                            <div class="card-caption">
                                <div class="card-title">
                                    <a href="#"><?= $product['title'] ?></a>
                                </div>
                                <div class="card-price text-center">
                                    <?php if ($product['old_price']): ?>
                                        <del><?= $product['old_price'] ?> грн.</del>
                                    <?php endif; ?>
                                    <?= $product['price'] ?> грн.
                                </div>
                                <a href="?cart=add&id=<?= $product['id'] ?>" class="btn btn-info btn-block add-to-cart" data-id="<?= $product['id'] ?>">
                                    <i class="fas fa-cart-arrow-down"></i> Купить
                                </a>
                                <div class="item-status"><i class="fas fa-check text-success"></i> В наличии</div>
                            </div>
                        </div><!-- /product-card -->
                    <?php endforeach; ?>
                <?php endif; ?>

            </div><!-- /product-cards -->

        </div><!-- /row -->

        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div><!-- /row -->

    </div><!-- /container -->
</div><!-- /wrapper -->

<!-- Modal -->
<div class="modal fade cart-modal" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="product.html"><img src="img/1.jpg" alt="CORT AD810M Акустическая гитара"></a></td>
                        <td><a href="product.html">CORT AD810M Акустическая гитара</a></td>
                        <td>2 799</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td><a href="product.html"><img src="img/2.jpg" alt="Crafter D6/N Акустическая гитара"></a></td>
                        <td><a href="product.html">Crafter D6/N Акустическая гитара</a></td>
                        <td>12 626</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right">Товаров: 3 <br> Сумма: 28 051 грн.</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Оформить заказ</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
