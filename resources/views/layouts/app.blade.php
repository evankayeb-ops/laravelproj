<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager - Dashboard Aesthetic</title>
    <style>
        * { box-sizing: border-box; }
        
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: #090a0c; /* Deep minimalist obsidian background */
            margin: 0;
            padding: 0;
            color: #d4d4d8; 
            font-size: 17px; /* Larger, ultra-comfortable base font */
            line-height: 1.6;
        }

        /* --- Different Structure: App Layout Container --- */
        .app-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Navigation Structure */
        aside {
            width: 280px;
            background: #0e1013;
            border-right: 1px solid #1f2229;
            padding: 40px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            font-size: 22px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            color: #9ca3af;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-links a:hover, .nav-links a.active {
            background: #181b22;
            color: #ffffff;
        }

        /* Main Content Wrapper */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        topbar {
            background: #0e1013;
            border-bottom: 1px solid #1f2229;
            padding: 24px 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 18px;
            font-weight: 600;
            color: #f3f4f6;
        }

        .container {
            max-width: 1100px; /* Wider, more breathing room */
            width: 100%;
            margin: 0 auto;
            padding: 48px;
        }

        /* Oversized, Elegant Content Cards */
        .card {
            background: #13161c; 
            border-radius: 20px;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.6);
            padding: 40px;
            margin-bottom: 32px;
            border: 1px solid #1f2229;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        th, td {
            text-align: left;
            padding: 20px 22px; /* Bigger padding for breathable rows */
        }

        th { 
            background: #181b22; 
            color: #9ca3af;
            font-weight: 600;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        th:first-child { border-top-left-radius: 12px; border-bottom-left-radius: 12px; }
        th:last-child { border-top-right-radius: 12px; border-bottom-right-radius: 12px; }

        td {
            border-bottom: 1px solid #1f2229;
            font-size: 16px;
            color: #e4e4e7;
        }

        /* --- Crystal Clear High-Contrast Buttons --- */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: 0.95;
        }

        .btn-primary { 
            background: #f4f4f5; 
            color: #090a0c; 
        }
        
        .btn-edit { 
            background: #3f3f46; 
            color: #ffffff; 
        }
        
        .btn-delete { 
            background: #1c1917; 
            color: #f87171; 
            border: 1px solid #7f1d1d;
        }
        
        .btn-status { 
            background: #27272a; 
            color: #ffffff; 
            border: 1px solid #52525b;
        }

        .status-pending { 
            color: #d4d4d8; 
            font-weight: 600; 
            background: #1f2229;
            border: 1px solid #3f3f46;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 14px;
        }
        
        .status-completed { 
            color: #ffffff; 
            font-weight: 600; 
            background: #090a0c;
            border: 1px solid #52525b;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 14px;
        }

        form.inline { display: inline; }

        input[type=text], textarea, input[type=date], select {
            width: 100%;
            padding: 16px 20px; /* Oversized input boxes */
            margin-top: 8px;
            margin-bottom: 24px;
            border: 1.5px solid #272a33;
            background: #090a0c;
            border-radius: 12px;
            color: #ffffff;
            font-size: 16px;
            transition: all 0.2s;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #a1a1aa;
            background: #13161c;
            box-shadow: 0 0 0 4px rgba(161, 161, 170, 0.15);
        }

        label { 
            font-weight: 600; 
            font-size: 15px; 
            color: #a1a1aa; 
        }

        .alert-success {
            background: #13161c;
            color: #f4f4f5;
            padding: 20px 24px;
            border-radius: 14px;
            margin-bottom: 32px;
            border: 1px solid #52525b;
            font-weight: 500;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="app-layout">
        <!-- Sidebar Navigation -->
        <aside>
            <div class="brand">
                <span>▪️</span> Task Workspace
            </div>
            <ul class="nav-links">
                <li><a href="#" class="active">Overview & Tasks</a></li>
            </ul>
            <div style="font-size: 13px; color: #52525b; padding-top: 20px; border-top: 1px solid #1f2229;">
                Monochrome Minimal v3.0
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="main-wrapper">
            <topbar>
                <span>Task Manager Dashboard</span>
            </topbar>

            <div class="container">
                {{-- Flash message shown after add/edit/delete/status actions --}}
                @if (session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                {{-- Page-specific content goes here --}}
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>