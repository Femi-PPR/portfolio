function dismissAlert(event) {
    $target = $(event.target);
    $target.parent().remove();
}
