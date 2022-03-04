import 'dart:convert';
import 'package:http/http.dart' as http;

class TrocByUser {
  static Future<List<dynamic>> allTrocsByUser(int id) async {
    print(id);
    var data = {
      "idUser": 2,
    };
    String body = jsonEncode(data);

    http.Response response = await http.post(
      Uri.parse('http://localhost:8000/getAllByUser.php'),
      headers: {"Content-Type": "application/json"},
      body: body,
    );

    List<dynamic> all = jsonDecode(response.body);
    print(all);

    return all;
  }
}
