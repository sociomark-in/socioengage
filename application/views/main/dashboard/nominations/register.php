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
        <section class="my-5">
            <div class="row m-0 justify-content-center g-0">
                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-12">
                    <?= form_open(base_url('api-auth-register')) ?>
                    <div class="mb-3">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="inputUsername">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php $this->load->view('components/_common_js') ?>
</body>

</html>