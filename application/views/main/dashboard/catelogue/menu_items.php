<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/_head') ?>
    <?php $this->load->view('components/_common_css') ?>
    <title><?= $page['title'] ?></title>
</head>

<body>
<?php $this->load->view('components/_common_nav') ?>
    <main>
        <section class="py-4">
            <div class="container">
                <?php $this->load->view('components/dashboard/_page_title', $data = ["breadcrumb" => ['Home' => base_url(), 'Menus' => 'current']]) ?>
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <?php if (isset($_SESSION['failed'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('failed'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="accordion mb-3" id="accordionExample">
                            <?php for ($i = 0; $i < count($items); $i++) :?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" aria-expanded="false" aria-controls="collapse<?= $i ?>">
                                            <?= $items[$i]->item_title ?>
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $i ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <!-- 
                                                Array
                                                (
                                                    [menu_id] => 2
                                                    [cat_id] => 2
                                                    [item_title] => Portobello Mushroom
                                                    [item_description] => Pico de Gallo. Feta Cheese. Garlic Aioli.
                                                    [item_price] => 19
                                                    [item_created_at] => 2023-08-03 16:27:36
                                                    [id] => 2
                                                    [cat_title] => Burgers
                                                    [cat_description] => 
                                                    [cat_created_at] => 2023-08-03 17:05:30
                                                )
                                             -->
                                            <div class="row justify-content-between">
                                                <div class="col-auto">
                                                    <div class="title">
                                                        <h3><?= $items[$i]->item_title ?></h3>
                                                    </div>
                                                    <div class="desc">
                                                        <p>
                                                            <?= $items[$i]->item_description ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="price">
                                                        <h4>&dollar;&nbsp;<?= $items[$i]->item_price ?>.00</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $items[$i]->menu_id ?>">
                                                    Edit item Details
                                                </button>
                                                <a href="<?= base_url("api-menu-item/" . $items[$i]->menu_id . "/delete") ?>" class="btn btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Add New Item</h2>
                        <?= form_open_multipart(base_url('api-menu-item/new')) ?>
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Item Title</label>
                            <input type="text" class="form-control" name="item[title]" placeholder="" id="inputUsername">
                        </div>
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Item Price</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" name="item[price]" placeholder="" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Item Description</label>
                            <textarea class="form-control" name="item[description]" id="" cols="30" rows="3" placeholder=""></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Item Description</label>
                            <input type="file" name="item_file" id="" class="form-control">
                            <!-- <textarea class="form-control" name="item[description]" id="" cols="30" rows="3" placeholder=""></textarea> -->
                        </div>
                        <input type="hidden" name="item[category]" value="<?= $category_id ?>">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php for ($i = 0; $i < count($items); $i++) : ?>
            <div class="modal modal-lg fade" id="exampleModal<?= $items[$i]->menu_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <?= form_open(base_url('api-menu-item/' . $items[$i]->menu_id . '/edit')) ?>
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editing <?= $items[$i]->item_title ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="inputUsername" class="form-label">Item Title</label>
                                <input type="text" class="form-control" name="item[title]" value="<?= $items[$i]->item_title ?>" placeholder="<?= $items[$i]->item_title ?>" id="inputUsername">
                            </div>
                            <div class="mb-3">
                                <label for="inputUsername" class="form-label">Item Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="number" name="item[price]" value="<?= $items[$i]->item_price ?>" placeholder="<?= $items[$i]->item_price ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputUsername" class="form-label">Item Description</label>
                                <textarea class="form-control" name="item[description]" id="" cols="30" rows="3" value="" placeholder="<?= $items[$i]->item_description ?>"><?= $items[$i]->item_description ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endfor ?>
    </main>
    <?php $this->load->view('components/_common_js') ?>
</body>

</html>