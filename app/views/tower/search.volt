
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("tower/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("tower/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Companyid</th>
            <th>Number</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for tower in page.items %}
        <tr>
            <td>{{ tower.getId() }}</td>
            <td>{{ tower.getCompanyid() }}</td>
            <td>{{ tower.getNumber() }}</td>
            <td>{{ link_to("tower/edit/"~tower.getId(), "Edit") }}</td>
            <td>{{ link_to("tower/delete/"~tower.getId(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("tower/search", "First") }}</td>
                        <td>{{ link_to("tower/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("tower/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("tower/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
