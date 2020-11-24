</div>

<div class="bg-black text-white">
    <footer class="container mx-auto p-2 lg:p-0">
        <div class="grid px-2 py-12 grid-cols-2 md:grid-cols-3 gap-3">
            <?php if (check_menu_exists('footer-1')) : ?>
            <div>
                <div class="font-bold mb-2">Fique por dentro</div>
                <ul>
                    <?php echo mazze_footer_menu('footer-1') ?>
                </ul>
            </div>
            <?php endif; ?>
            <?php if (check_menu_exists('footer-2')) : ?>
            <div>
                <div class="font-bold mb-2">Atalhos</div>
                <ul>
                    <?php echo mazze_footer_menu('footer-2') ?>
                </ul>
            </div>
            <?php endif; ?>
            <div>
                <div class="font-bold mb-2">Contatos</div>
                <dl>
                    <dt>Rua Sílvio Cezar Leite, 30 - Salgado Filho</dt>
                    <dt>(79) 9 9958-4524</dt>
                    <dt>mazze.gg@gmail.com</dt>
                    <dt>Aracaju - SE, 49020-330</dt>
                </dl>
            </div>
        </div>
        <div class="flex justify-end py-6">
            <a href="<?php echo home_url() ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logobranca.svg" alt="<?php echo bloginfo('name'); ?>" class="mr-12">
            </a>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>

</body>

</html>