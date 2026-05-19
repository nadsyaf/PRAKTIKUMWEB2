<div class="text-center">
    <div class="error mx-auto" data-text="404">404</div>
    <p class="lead text-gray-800 mb-4">Page Not Found</p>
    <p class="text-gray-500 mb-0">
        Halaman yang Anda cari tidak ditemukan. Silahkan kembali ke halaman utama.
    </p>
    <a href="?page=dashboard" class="btn btn-primary mt-4">
        <i class="fas fa-chevron-left"></i> Kembali ke Dashboard
    </a>
</div>

<style>
    .error {
        font-size: 110px;
        font-weight: bold;
        color: #ffd700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        position: relative;
    }
    
    .error::after {
        content: attr(data-text);
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        color: transparent;
        -webkit-text-stroke: 2px #ffd700;
    }
</style>
