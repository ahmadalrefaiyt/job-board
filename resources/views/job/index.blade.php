<div>
    <h1>Job Board</h1>

    <table>
        <thead>
            <tr>
                <td>Title</td>
                <td>Salary</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td>{{ $job['title'] }}</td>
                    <td>${{ $job['salary'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>