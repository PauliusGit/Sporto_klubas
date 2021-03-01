<?php require APPROOT . '/views/inc/header.php'; ?>

 
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Susikurkite paskyrą čia</h2>
            <p>Užpildykite būtinus laukus (pažymėta žvaigždute)</p>
            <form action="<?php echo URLROOT; ?>/users/register" method="post">
                <div class="form-group">
                    <label for="name">Vardas: <sup>*</sup></label>
                    <input type="text" name="firstName" class="form-control form-control-lg <?php echo (!empty($data['firstName_err'])) ? 'is-invalid' : '' ?>" 
                    value="<?php echo $data['firstName']; ?>">
                    <span class="invalid-feedback"><?php echo $data['firstName_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="Surname">Pavardė: <sup>*</sup></label>
                    <input type="text" name="lastName" class="form-control form-control-lg <?php echo (!empty($data['lastName_err'])) ? 'is-invalid' : '' ?>" 
                    value="<?php echo $data['lastName']; ?>">
                    <span class="invalid-feedback"><?php echo $data['lastName_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="Email">El. Paštas: <sup>*</sup></label>
                    <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" 
                    value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="Password">Slaptažodis: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" 
                    value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="TelNumber">Telefono numeris:</label>
                    <input type="text" name="phoneNr" class="form-control form-control-lg" value="<?php echo $data['phoneNr']; ?>">
                </div>
                <div class="form-group">
                    <label for="Address">Namų adresas:</label>
                    <input type="text" name="address" class="form-control form-control-lg"  value="<?php echo $data['address']; ?>">
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Registruotis" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Turite paskyrą, prisijungkite?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>