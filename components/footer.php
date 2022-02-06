</main>
<footer>
    <div class="footer__left">
        <a href="https://www.pinterest.ru/search/pins/?q=cosmetic" title="pinterest" target="_blank"><i
               class="fab fa-pinterest"></i></a>
        <a href="https://www.facebook.com/OfficialMAKEUP/" title="facebook" target="_blank"><i
               class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/hashtag/makeup" title="twitter" target="_blank"><i class=" fab
           fa-twitter"></i></a>
        <a href="https://www.instagram.com/makeup.kitchen/?hl=en" title="instagram" target="_blank"><i
               class="fab fa-instagram"></i></a>
    </div>
    <div class="footer__right">
        <form method="get" action="./?page=home">
            <label>
                Подпишитесь на наши новости:
                <input type="hidden" name="page" value="subscribed">
                <input type="hidden" name="nofooter">
                <input placeholder="почта" type="email" name="email" required>
                <button type="submit">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </label>
        </form>
    </div>
</footer>
<p style="text-align: center; margin-bottom: 4rem;">Алина Шнейдер 2022 &copy;</p>

<script src="./scripts/common.js"></script>
<script src="./scripts/<?= $page ?>.js"></script>
</body>
</html>