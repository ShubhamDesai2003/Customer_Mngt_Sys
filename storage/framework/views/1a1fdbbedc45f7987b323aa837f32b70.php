<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'Laravel')); ?> - CRM System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
        }

        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: #333;
        }

        .welcome-container {
            background: white;
            border-radius: 20px;
            padding: 60px 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 600px;
            margin: auto;
        }

        .welcome-icon {
            font-size: 60px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-weight: 700;
        }

        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .btn-group-custom {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn-custom {
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-secondary-custom {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-secondary-custom:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .features {
            margin-top: 50px;
            text-align: left;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .feature-item {
            padding: 15px;
            background: #f7fafc;
            border-radius: 10px;
            text-align: center;
        }

        .feature-icon {
            font-size: 30px;
            color: var(--secondary-color);
            margin-bottom: 10px;
        }

        .feature-title {
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-icon">
            <i class="fas fa-chart-line"></i>
        </div>

        <h1><?php echo e(config('app.name', 'Laravel')); ?></h1>
        <p class="subtitle">Complete Customer Relationship Management System</p>

        <?php if(Route::has('login')): ?>
            <div class="btn-group-custom">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-custom btn-primary-custom">
                        <i class="fas fa-tachometer-alt"></i> Go to Dashboard
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-custom btn-primary-custom">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                    <?php if(Route::has('register')): ?>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-custom btn-secondary-custom">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="features">
            <div class="feature-item">
                <div class="feature-icon"><i class="fas fa-users"></i></div>
                <div class="feature-title">Manage Customers</div>
            </div>
            <div class="feature-item">
                <div class="feature-icon"><i class="fas fa-shopping-cart"></i></div>
                <div class="feature-title">Track Orders</div>
            </div>
            <div class="feature-item">
                <div class="feature-icon"><i class="fas fa-chart-bar"></i></div>
                <div class="feature-title">Analytics & Reports</div>
            </div>
            <div class="feature-item">
                <div class="feature-icon"><i class="fas fa-lock"></i></div>
                <div class="feature-title">Secure Access</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH E:\Zoro\Luffy\Projects\impact-guru-crm\resources\views/welcome.blade.php ENDPATH**/ ?>