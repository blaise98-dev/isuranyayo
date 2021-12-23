<!-- menu markups -->
<div class="menu_fostrap">
    <nav>
        <div class="nav-fostrap">
            <ul>
                <?php
                $query = mysqli_query($con, "select * from tblcategory where Is_Active=1");
                while ($row = mysqli_fetch_array($query)) {
                    $cat = $row['id'];
                ?>
                <li><a href="category.php?catid=<?php echo $row['id']; ?>"
                        title="<?php echo $row['Description']; ?>"><?php echo $row['CategoryName']; ?></a></li>
                <?php
                } ?>
                <li><a href="javascript:void(0)">Language<span class="arrow-down"></span></a>
                    <ul class="dropdown sub-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#" data-value="separated link" class="lang-select" data-lang="en"><span
                                    class="ml-1 flag-icon flag-icon-us"></span><span>
                                    English</span></a></li>
                        <li><a href="#" data-value="another action" class="lang-select" data-lang="fr"><span
                                    class="ml-1 flag-icon flag-icon-fr"></span>
                                <span>France</span></a></li>
                        <li><a href="#" data-value="another action" class="lang-select" data-lang="sw"><span
                                    class="ml-1 flag-icon flag-icon-tz"></span>
                                <span>Swahili</span></a></li>
                    </ul>
                    <div class="pull-right" id="google_translate_element"></div>
                </li>
            </ul>
        </div>
        <div class="nav-bg-fostrap">
            <div class="navbar-fostrap"> <span></span> <span></span> <span></span> </div>
            <div><a href="" class="title-mobile"><img src="images/img1.png" width="140" alt="" /></a></div>
            <div>
                <ul class="navbar-lang dropdown sub-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#" data-value="separated link" class="lang-select" data-lang="en"><span
                                class="ml-1 flag-icon flag-icon-us"></span></a></li>
                    <li><a href="#" data-value="another action" class="lang-select" data-lang="fr"><span
                                class="ml-1 flag-icon flag-icon-fr"></span>
                        </a></li>
                    <li><a href="#" data-value="another action" class="lang-select" data-lang="sw"><span
                                class="ml-1 flag-icon flag-icon-tz"></span>
                        </a></li>
                </ul>
                <div class="pull-right" id="google_translate_element"></div>
                </li>
            </div>
        </div>
    </nav>
</div>

<!-- language scripts -->
<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en'
    }, 'google_translate_element');
}

var flags = document.getElementsByClassName('lang-select');

Array.prototype.forEach.call(flags, function(e) {
    e.addEventListener('click', function() {
        var lang = e.getAttribute('data-lang');
        var languageSelect = document.querySelector("select.goog-te-combo");
        languageSelect.value = lang;
        languageSelect.dispatchEvent(new Event("change"));
    });
});
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>


<script>
jQuery(window).load(function() {
    var cookie = document.cookie;
    var position = cookie.indexOf("googtrans");
    var language = cookie.substring(position + 10, position + 16);
    var act_lang = language.split('/');
    var flag = act_lang[act_lang.length - 1].length != 2 ? 'us' : act_lang[act_lang.length - 1] == 'en' ? 'us' :
        act_lang[act_lang.length - 1] == 'sw' ? 'tz' : act_lang[act_lang.length - 1];
    $("#dropdownMenu1 span").replaceWith("<span class='flag-icon flag-icon-" + flag + "'></span>");
});

$(".dropdown-menu li a").click(function() {
    $('#loader-cont').show();
    $("#dropdownMenu1 span").replaceWith($(this).find('.flag-icon'));
    $(this).prepend($("#dropdownMenu1").html());
    $('#loader-cont').hide();
});
</script>

<script>
$(document).ready(function() {
    $('.navbar-fostrap').click(function() {
        $('.nav-fostrap').toggleClass('visible');
        $('body').toggleClass('cover-bg');
    });
});
</script>