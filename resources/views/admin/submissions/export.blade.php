<table class="table mb-0">
    <thead>
        <tr>
            <th>Title</th>
            @foreach($submission->additional as $key => $additional)
            <th>{{$key}}</th>
            @endforeach
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{$submission->post['en']->title}}</th>
            @foreach($submission->additional as $key => $additional)
            <th scope="row">{{$additional}}</th>
            @endforeach
            <th scope="row">{{$submission->created_at}}</th>
        </tr>
    </tbody>
</table>
