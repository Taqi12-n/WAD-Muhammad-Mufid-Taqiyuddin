<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu Digital</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div class="container" style="max-width: 600px; margin: 40px auto;">
        <h1>Buku Tamu</h1>

        <?php if(session('success')): ?>
            <div style="color: green;"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <form action="<?php echo e(route('guestbook.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" name="name" placeholder="Nama" required><br><br>
            <input type="email" name="email" placeholder="Email (opsional)"><br><br>
            <textarea name="message" placeholder="Pesan" required></textarea><br><br>
            <button type="submit">Kirim</button>
        </form>

        <hr>
        <h2>Isi Buku Tamu:</h2>
        <?php $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="margin-bottom: 20px; border-bottom: 1px solid #ccc;">
                <strong><?php echo e($entry->name); ?></strong> (<?php echo e($entry->email ?? 'Tidak ada email'); ?>)<br>
                <p><?php echo e($entry->message); ?></p>
                <small><?php echo e($entry->created_at->format('d M Y H:i')); ?></small>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\guestbook\resources\views/guestbook/index.blade.php ENDPATH**/ ?>