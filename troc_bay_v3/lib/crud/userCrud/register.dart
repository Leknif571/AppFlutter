import '../../model/user.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;

class Register {
  static Future<http.Response> addRegister(User user) async {
    var data = {
      "pseudo": user.pseudo,
      "email": user.email,
      "pass": user.pass,
      "lastName": user.lastName,
      "firstName": user.firstName,
      "localisation": user.localisation,
    };
    String body = jsonEncode(data);

    http.Response response = await http.post(
      Uri.parse('http://localhost:8000/create.php'),
      headers: {"Content-Type": "application/json"},
      body: body,
    );
    print(body);
    // print(user.email);
    return response;
  }
}