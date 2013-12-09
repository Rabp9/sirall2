function isRequired($ctrl) {
    $($ctrl).attr('requiestablecimiento', 'required');
}

function setValue($ctrl, $val) {
    $ctrl.val($val);
}

function isReadOnly($ctrl) {
    $($ctrl).attr('readonly', 'true');
}