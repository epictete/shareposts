<?php require APPROOT . '/views/inc/header.php'; ?>

    <?php flash('admin_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Welcome to the COGIP</h1>
            <p>Bonjour <?= $_SESSION['user_name'] ?> !</p>
            <p>Que souhaitez-vous faire aujourd'hui ?</p>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2">
            <a href="<?= URLROOT ?>/invoices/add" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Invoice
            </a>
        </div>
        <div class="col-md-2">
            <a href="<?= URLROOT ?>/people/add" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Contact
            </a>
        </div>
        <div class="col-md-2">
            <a href="<?= URLROOT ?>/companies/add" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Company
            </a>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>