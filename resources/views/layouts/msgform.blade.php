<div class="message-form">
  <form class="messaggio" action="{{ route('sendmessage', $singleFlat -> id) }}" method="post">
    @csrf
    @method('POST')
    <div class="">
      <textarea type="ta" name="msg" placeholder="Scrivi il messaggio..." value="" required rows="8" cols="80"></textarea>

    </div>
    <div class="">
      <input type="mail" name="email" required value="" placeholder="insert your email">

    </div>

    <button type="submit" name="button">Invia</button>

  </form>
</div>
