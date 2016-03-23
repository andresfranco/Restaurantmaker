
{{ content() }}

<div align="right">
    {{ link_to("apartment/new", "Create apartment") }}
</div>

{{ form("apartment/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search apartment</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id">Id</label>
        </td>
        <td align="left">
            {{ text_field("id", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="companyid">Companyid</label>
        </td>
        <td align="left">
            {{ text_field("companyid", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="towerid">Towerid</label>
        </td>
        <td align="left">
            {{ text_field("towerid", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="name">Name</label>
        </td>
        <td align="left">
            {{ text_field("name", "size" : 30) }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
