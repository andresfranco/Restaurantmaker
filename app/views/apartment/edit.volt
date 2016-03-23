{{ content() }}
{{ form("apartment/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("apartment", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit apartment</h1>
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
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
