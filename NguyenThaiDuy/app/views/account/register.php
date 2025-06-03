<?php include 'app/views/shares/header.php'; ?>

<?php
// Biến $errors và $oldData có thể được truyền từ controller
$errors = $errors ?? [];
$oldData = $oldData ?? [];
?>

<form method="post" action="/NguyenThaiDuy/account/save">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-white text-primary shadow-lg" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <h2 class="fw-bold mb-4 text-uppercase text-primary">Register New Account</h2>
                    <p class="text-secondary mb-4">Please fill in the details to create a new account.</p>

                    <!-- Username -->
                    <div class="form-outline mb-4">
                        <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="Enter username" required
                               value="<?= htmlspecialchars($oldData['username'] ?? '') ?>" />
                        <label class="form-label text-primary" for="username">Username</label>
                        <?php if (isset($errors['username'])): ?>
                            <small class="text-danger"><?= $errors['username'] ?></small>
                        <?php endif; ?>
                        <?php if (isset($errors['account'])): ?>
                            <small class="text-danger"><?= $errors['account'] ?></small>
                        <?php endif; ?>
                    </div>

                    <!-- Full Name -->
                    <div class="form-outline mb-4">
                        <input type="text" name="fullname" class="form-control form-control-lg" id="fullname" placeholder="Enter your full name" required
                               value="<?= htmlspecialchars($oldData['fullname'] ?? '') ?>" />
                        <label class="form-label text-primary" for="fullname">Full Name</label>
                        <?php if (isset($errors['fullname'])): ?>
                            <small class="text-danger"><?= $errors['fullname'] ?></small>
                        <?php endif; ?>
                    </div>

                    <!-- Email -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Enter your email" required
                               value="<?= htmlspecialchars($oldData['email'] ?? '') ?>" />
                        <label class="form-label text-primary" for="email">Email</label>
                        <?php if (isset($errors['email'])): ?>
                            <small class="text-danger"><?= $errors['email'] ?></small>
                        <?php endif; ?>
                    </div>

                    <!-- Phone -->
                    <div class="form-outline mb-4">
                        <input type="text" name="phone" class="form-control form-control-lg" id="phone" placeholder="Enter your phone number" required
                               value="<?= htmlspecialchars($oldData['phone'] ?? '') ?>" />
                        <label class="form-label text-primary" for="phone">Phone</label>
                        <?php if (isset($errors['phone'])): ?>
                            <small class="text-danger"><?= $errors['phone'] ?></small>
                        <?php endif; ?>
                    </div>

                    <!-- Avatar -->
                    <div class="form-outline mb-4">
                        <input type="text" name="avatar" class="form-control form-control-lg" id="avatar" placeholder="Enter avatar URL (optional)"
                               value="<?= htmlspecialchars($oldData['avatar'] ?? '') ?>" />
                        <label class="form-label text-primary" for="avatar">Avatar URL</label>
                    </div>

                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Create a password" required />
                        <label class="form-label text-primary" for="password">Password</label>
                        <?php if (isset($errors['password'])): ?>
                            <small class="text-danger"><?= $errors['password'] ?></small>
                        <?php endif; ?>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-outline mb-4">
                        <input type="password" name="confirmpassword" class="form-control form-control-lg" id="confirmpassword" placeholder="Confirm your password" required />
                        <label class="form-label text-primary" for="confirmpassword">Confirm Password</label>
                        <?php if (isset($errors['confirmPass'])): ?>
                            <small class="text-danger"><?= $errors['confirmPass'] ?></small>
                        <?php endif; ?>
                    </div>

                    <!-- Role Selection -->
                    <div class="form-outline mb-4">
                        <select class="form-select form-select-lg" name="role" id="role" aria-label="Select role">
                            <option value="user" <?= (isset($oldData['role']) && $oldData['role'] === 'user') ? 'selected' : '' ?>>User</option>
                            
                        </select>
                        <label class="form-label text-primary" for="role">Role</label>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2 mb-4">
                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>

                    <!-- Login Link -->
                    <div>
                        <p class="text-secondary mb-0">Already have an account?
                            <a href="/NguyenThaiDuy/account/login" class="text-primary fw-bold">Login here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include 'app/views/shares/footer.php'; ?>
