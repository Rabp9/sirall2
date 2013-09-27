function isRequired($ctrl) {
    $($ctrl).attr('required', 'required');
}

function setValue($ctrl, $val) {
    $($ctrl).attr('value', $val);
}

function isReadOnly($ctrl) {
    $($ctrl).attr('readonly', 'true');
}