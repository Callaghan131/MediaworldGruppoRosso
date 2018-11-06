<?php
function TestBlockHTML($parametri)
{
return <<<HTML
    <label class="row comparsa"><span class="col-xs-12 col-sm-4">Nome</span>
      <span class="col-xs-12 col-sm-4"><input type="text" class="form-control" name="nome" value="{$parametri[1]}" placeholder="Gianmarco" required autofocus></span>
    </label>

    <label class="row comparsa"><span class="col-xs-12 col-sm-4">Cognome</span>
      <span class="col-xs-12 col-sm-4"><input type="text" class="form-control" name="cognome" value="{$parametri[2]}" placeholder="Forchetta" required></span>
    </label>

    <label class="row comparsa"><span class="col-xs-12 col-sm-4">Username</span>
      <span class="col-xs-12 col-sm-4" ><input type="text" class="form-control" name="username" value="$parametri[3]" placeholder="Callaghan131" required></span>
    </label>

    <label class="row comparsa"><span class="col-xs-12 col-sm-4">Password</span>
      <span class="col-xs-12 col-sm-4"><input type="password"  class="form-control" name="password" value="$parametri[4]" placeholder="123" required></span>
    </label>

    <label class="row comparsa"><span class="col-xs-12 col-sm-4">Età</span>
      <span class="col-xs-12 col-sm-4"><input type="number"  class="form-control" name="eta" min="0" max="130" value="$parametri[5]" placeholder="20" required></span>
    </label>
HTML;
}
?>
