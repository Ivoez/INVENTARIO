<?php
require_once __DIR__ . '/../core/BaseController.php';

class DashboardController extends BaseController {
    public function index() {
        echo "Dashboard";
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }
}
