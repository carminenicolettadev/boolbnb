<div class="message-form">
  <form class="" action="{{ route('sendmessage', $singleFlat -> id) }}" method="post">
    @csrf
    @method('POST')


    <input type="text" name="msg" placeholder="Scrivi il messaggio..." value="">
    <label for="email">Inserisci il tuo indirizzo email</label>
    <input type="text" name="email" value="">
    <button type="submit" name="button">Invia</button>






  </form>
</div>
