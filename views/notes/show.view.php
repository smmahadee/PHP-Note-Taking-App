<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/header.php") ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p><?= htmlspecialchars($note['body']) ?> </p>

        <div class="mt-4">
            <a class=" rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
        </div>

        <form method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button type="submit" class="text-red-600 font-semibold mt-4">Delete</button>
        </form>
    </div>
</main>


<?php require base_path("views/partials/footer.php") ?>