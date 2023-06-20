<table class="table mb-0">
    <thead>
        <tr >
            <th style="width: 300px">Subscriber Emails</th> 
        </tr>
    </thead>
    <tbody> 
        @foreach ($subscribers as $subscriber)
      
        <tr >
            <td scope="row" style="width: 300px"> {{$subscriber->email}}</td> 
            <td scope="row" style="width: 300px"> {{$subscriber->name}}</td> 
            <td scope="row" style="width: 300px"> {{$subscriber->surname}}</td>
           
        </tr> 
        @endforeach  
    </tbody>
</table>
