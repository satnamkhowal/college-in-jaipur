<footer class="footer mt-5 pt-5 pb-3 text-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5"><img src="<?= url('assets/logo-white.svg') ?>" alt="College in Jaipur" width="220" height="55"><p class="text-white-50 mt-3 mb-0">A focused platform to discover colleges, courses and admission information across Jaipur.</p></div>
            <div class="col-6 col-lg-2"><h6>Explore</h6><a href="<?= url('colleges.php') ?>">Colleges</a><a href="<?= url('courses.php') ?>">Courses</a><a href="<?= url('compare.php') ?>">Compare</a></div>
            <div class="col-6 col-lg-2"><h6>Company</h6><a href="<?= url('about.php') ?>">About</a><a href="<?= url('contact.php') ?>">Contact</a><a href="<?= url('privacy.php') ?>">Privacy</a></div>
            <div class="col-lg-3"><h6>Need admission guidance?</h6><p class="text-white-50 small">Share your preferred course and our team will help you shortlist options.</p><a class="btn btn-warning rounded-pill" href="<?= url('contact.php') ?>">Request a callback</a></div>
        </div>
        <hr class="border-secondary my-4"><div class="d-flex flex-column flex-md-row justify-content-between small text-white-50"><span>© <?= date('Y') ?> College in Jaipur.</span><span>Powered by Groot Software</span></div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= url('assets/js/app.js') ?>"></script>
</body></html>
