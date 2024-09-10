<?php
$uniq = uniqid("showmore_");
?>
<div class="gsoa-showmore <?= $block["className"] ?? "" ?>" id="<?= $uniq ?>">
    <div class="gsoa-showmore__inner">
        <InnerBlocks />
    </div>
    <a class="gsoa-showmore__button" id="<?= $uniq ?>-button" href="javascript:void(0)" >
        <?= __("Mehr anzeigen", "unsinnig") ?>
    </a>
</div>

<style>
    #<?= $uniq ?> .gsoa-showmore__inner {
        max-height: 50vh;
        overflow: hidden;
        mask-image: linear-gradient(black 0%, black 50%, transparent calc(100% - 2rem));
    }
</style>

<script>
    const <?=$uniq?>Button = document.getElementById("<?= $uniq ?>-button");
    const <?=$uniq?>Inner = document.querySelector("#<?= $uniq ?> .gsoa-showmore__inner");

    <?=$uniq?>Button.addEventListener("click", () => {
        <?=$uniq?>Inner.animate([
            {
                maxHeight: "50vh",
                maskImage: "linear-gradient(black 0%, black 50%, transparent calc(100% - 2rem)",
                offset: 0
            },
            {
                maxHeight: <?=$uniq?>Inner.scrollHeight + "px", offset: 0.99,
                maskImage: "unset"
            },
            {
                maxHeight: "unset", offset: 1,
                maskImage: "unset"
            }
        ], {
            duration: 500,
            easing: "ease-in-out",
            fill: "forwards"
        });

        <?=$uniq?>Button.remove();
    });
</script>