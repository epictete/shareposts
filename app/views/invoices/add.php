<?php require APPROOT . '/views/inc/header.php'; ?>

    <a href="<?= URLROOT ?>/invoices" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Add Invoice</h2>
        <p>Create a new invoice with this form</p>
        <form action="<?= URLROOT ?>/invoices/add" method="post">
            <div class="form-group">
                <label for="number">Number: <sup>*</sup></label>
                <input type="text" name="number" class="form-control form-control-lg <?php echo (!empty($data['number_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['number'] ?>">
                <span class="invalid-feedback"><?= $data['number_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="date">Date (yyyy-mm-dd): <sup>*</sup></label>
                <input type="text" name="date" class="form-control form-control-lg <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['date'] ?>">
                <span class="invalid-feedback"><?= $data['date_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="company">Company: <sup>*</sup></label>
                <input type="text" name="company" class="form-control form-control-lg <?php echo (!empty($data['company_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['company'] ?>">
                <span class="invalid-feedback"><?= $data['company_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="contact">Contact: <sup>*</sup></label>
                <input type="text" name="contact" class="form-control form-control-lg <?php echo (!empty($data['contact_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['contact'] ?>">
                <span class="invalid-feedback"><?= $data['contact_err'] ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>