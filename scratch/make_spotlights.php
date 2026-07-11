<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

\App\Models\TourPackage::whereIn('slug', ['singapore', 'bali', 'dubai'])->update(['is_spotlight' => true]);
echo "Updated spotlights successfully.\n";
