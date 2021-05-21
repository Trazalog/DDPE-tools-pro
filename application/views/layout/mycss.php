<style>
.dropup-content {
    display: none;
    position: absolute;
    bottom: 50px;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.outline {
    color: #007bff;
    background-color: transparent;
    background-image: none;
    border-color: #80e489;
}

.btn-arrow-right,
.btn-arrow-left {
    position: relative;
    padding-left: 18px;
    padding-right: 18px;
}

.btn-arrow-right {
    padding-left: 36px;
}

.btn-arrow-left {
    padding-right: 36px;
}

.btn-arrow-right:before,
.btn-arrow-right:after,
.btn-arrow-left:before,
.btn-arrow-left:after {
    /* make two squares (before and after), looking similar to the button */
    content: "";
    position: absolute;
    top: 5px;
    /* move it down because of rounded corners */
    width: 22px;
    /* same as height */
    height: 22px;
    /* button_outer_height / sqrt(2) */
    background: inherit;
    /* use parent background */
    border: inherit;
    /* use parent border */
    border-left-color: transparent;
    /* hide left border */
    border-bottom-color: transparent;
    /* hide bottom border */
    border-radius: 0px 4px 0px 0px;
    /* round arrow corner, the shorthand property doesn't accept "inherit" so it is set to 4px */
    -webkit-border-radius: 0px 4px 0px 0px;
    -moz-border-radius: 0px 4px 0px 0px;
}

.btn-arrow-right:before,
.btn-arrow-right:after {
    transform: rotate(45deg);
    /* rotate right arrow squares 45 deg to point right */
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
}

.btn-arrow-left:before,
.btn-arrow-left:after {
    transform: rotate(225deg);
    /* rotate left arrow squares 225 deg to point left */
    -webkit-transform: rotate(225deg);
    -moz-transform: rotate(225deg);
    -o-transform: rotate(225deg);
    -ms-transform: rotate(225deg);
}

.btn-arrow-right:before,
.btn-arrow-left:before {
    /* align the "before" square to the left */
    left: -11px;
}

.btn-arrow-right:after,
.btn-arrow-left:after {
    /* align the "after" square to the right */
    right: -11px;
}

.btn-arrow-right:after,
.btn-arrow-left:before {
    /* bring arrow pointers to front */
    z-index: 1;
}

.btn-arrow-right:before,
.btn-arrow-left:after {
    /* hide arrow tails background */
    background-color: white;
}

@media(min-width: 320px) {
    .responsiv {
        width: 800px;
        overflow-x: auto;
    }
}

@media(min-width: 600px) {
    .responsiv {
        width: 100%;
    }
}

.btn-arrow-right-final {
    position: relative;
    padding-left: 18px;
    padding-right: 18px;
}

.btn-arrow-right-final {
    padding-left: 36px;
}

.btn-arrow-right-final:before {
    /* make two squares (before and after), looking similar to the button */
    content: "";
    position: absolute;
    top: 5px;
    /* move it down because of rounded corners */
    width: 22px;
    /* same as height */
    height: 22px;
    /* button_outer_height / sqrt(2) */
    background: inherit;
    /* use parent background */
    border: inherit;
    /* use parent border */
    border-left-color: transparent;
    /* hide left border */
    border-bottom-color: transparent;
    /* hide bottom border */
    border-radius: 0px 4px 0px 0px;
    /* round arrow corner, the shorthand property doesn't accept "inherit" so it is set to 4px */
    -webkit-border-radius: 0px 4px 0px 0px;
    -moz-border-radius: 0px 4px 0px 0px;
}

.btn-arrow-right-final:before {
    transform: rotate(45deg);
    /* rotate right arrow squares 45 deg to point right */
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
}

.btn-arrow-right-final:before {
    /* align the "before" square to the left */
    left: -11px;
}

.btn-arrow-right-final:before {
    /* hide arrow tails background */
    background-color: white;
}
</style>