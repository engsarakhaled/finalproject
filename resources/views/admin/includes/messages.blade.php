<div class="container my-5">
    <div class="mx-2">
      <div class="row justify-content-between mb-2 pb-2">
        <h2 class="fw-bold fs-2 col-auto">Unread Messages</h2>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-borderless display" id="_table">
          <thead>
            <tr>
              <th scope="col">Created At</th>
              <th scope="col">Message</th>
              <th scope="col">Sender</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($messages as $message)
              <tr>
                <th scope="row">{{ $message->created_at->format('d M Y') }}</th>
                <td><a href="{{ route('contact.show', $message->id) }}" class="text-decoration-none text-dark mark-as-read" >{{ Str::limit($message['unread_message'], 20, $end='...') }}</a></td>
                <td>{{ $message->name }}</td>
                <td class="text-center"><a class="text-decoration-none text-dark" href="{{ route('contact.delete', $message->id) }}"><img src="{{asset('assets/admin/images/trash-can-svgrepo-com.svg')}}"></a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  
    <hr>
  
    <div class="mx-2">
      <div class="row justify-content-between mb-2 pb-2">
        <h2 class="fw-bold fs-2 col-auto">Read Messages</h2>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-borderless display" id="_table2">
          <thead>
            <tr>
              <th scope="col">Created At</th>
              <th scope="col">Message</th>
              <th scope="col">Sender</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($readMessages as $readmessage)
              <tr>
                <th scope="row">{{ $readmessage->created_at->format('d M Y') }}</th>
                <td>{{ Str::limit($readmessage->contact->unread_message, 20, $end='...') }}</td>   
                <td>{{ $readmessage->contact->name }}</td>
                <td class="text-center"><a class="text-decoration-none text-dark" href="{{ route('contact.delete', $readmessage->id) }}"><img src="{{asset('assets/admin/images/trash-can-svgrepo-com.svg')}}"></a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>