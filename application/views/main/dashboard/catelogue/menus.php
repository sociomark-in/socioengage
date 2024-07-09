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
                <div class="row m-0">
                    <div class="col-xl-8 col-lg-7 col-md-6 col-12">
                        <div class="row">
                            <?php foreach ($menu as $category) : ?>
                                <?php if ($category['cat_title'] != "") : ?>
                                    <?php $count = count($category['items']); ?>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h3><?= $category['cat_title'] ?></h3>
                                                <p><?php
                                                    echo $count . " ";
                                                    echo ($count == 1) ? "item" : "items"; ?>
                                                </p>
                                                <div class="d-flex gap-2">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $category['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                        </svg>
                                                    </button>
                                                    <a href="<?= base_url("api-category/" . $category['id'] . "/delete") ?>" class="btn btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        </svg>
                                                    </a>
                                                    <a href="<?= base_url("menu/category/" . $category['id'] . "/menu-items") ?>" class="btn btn-primary">
                                                        Details<i class="fa-solid fa-arrow-right icon icon-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 col-12">
                        <h2>Add New Category</h2>
                        <?= form_open(base_url('api-category/new')) ?>
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Category Title</label>
                            <input type="text" class="form-control" name="category[title]" placeholder="" id="inputUsername">
                        </div>
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Category Description</label>
                            <textarea class="form-control" name="category[description]" id="" cols="30" rows="3" placeholder=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php for ($i = 0; $i < count($menu); $i++) : ?>
            <div class="modal modal-lg fade" id="exampleModal<?= $menu[$i]['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <?= form_open(base_url('api-category/' . $menu[$i]['id'] . '/edit')) ?>
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editing <?= $menu[$i]['cat_title'] ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="inputUsername" class="form-label">Item Title</label>
                                <input type="text" class="form-control" name="category[title]" value="<?= $menu[$i]['cat_title'] ?>" placeholder="<?= $menu[$i]['cat_title'] ?>" id="inputUsername">
                            </div>
                            <div class="mb-3">
                                <label for="inputUsername" class="form-label">Item Description</label>
                                <textarea class="form-control" name="category[description]" id="" cols="30" rows="3" value="" placeholder="<?= $menu[$i]['cat_description']?>"><?= $menu[$i]['cat_description']?></textarea>
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