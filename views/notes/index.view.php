<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/header.php") ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note): ?>
                <a href="/note?<?php echo http_build_query(['id' => $note['id']]) ?>" class="text-blue-500 hover:underline">
                    <li><?= htmlspecialchars($note['body']) ?></li>
                </a>
            <?php endforeach; ?>
        </ul>

        <a class="block mt-4 text-blue-500 underline" href="notes/create">Create Note</a>
    </div>
</main>


<?php require base_path("views/partials/footer.php") ?>