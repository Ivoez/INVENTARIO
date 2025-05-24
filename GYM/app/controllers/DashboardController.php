<?php
require_once __DIR__ . '/../core/BaseController.php';

class DashboardController extends BaseController {
    public function index() {
        
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }
}
