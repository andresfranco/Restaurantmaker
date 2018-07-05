
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("company/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("company/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for company in page.items %}
        <tr>
            <td>{{ company.getId() }}</td>
            <td>{{ company.getName() }}</td>
            <td>{{ link_to("company/edit/"~company.getId(), "Edit") }}</td>
            <td>{{ link_to("company/delete/"~company.getId(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("company/search", "First") }}</td>
                        <td>{{ link_to("company/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("company/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("company/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
