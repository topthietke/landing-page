import 'package:flutter/material.dart';
import 'package:hello_world/my_text.dart';

class MyWidget extends StatelessWidget {
  MyText text = MyText();
  MyImageUrl img = MyImageUrl();

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      width: double.infinity,
      child: Container(
        decoration: BoxDecoration(
          image: DecorationImage(image: AssetImage(img.bg), fit: BoxFit.cover),
        ),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            // ✅ Đẩy nội dung giữa màn hình
            Spacer(),
            CircleAvatar(radius: 50, backgroundImage: AssetImage(img.avatar)),
            SizedBox(height: 20),
            Text(
              text.title,
              style: TextStyle(
                fontSize: 24,
                fontWeight: FontWeight.bold,
                color: Colors.black,
              ),
            ),
            SizedBox(height: 10),
            Text(
              text.content,
              style: TextStyle(fontSize: 16, color: Colors.black),
            ),

            // ✅ Spacer đẩy button xuống cuối
            Spacer(),

            // ✅ Button nằm cuối màn hình
            Padding(
              padding: EdgeInsets.only(bottom: 40),
              child: ElevatedButton(
                onPressed: () {
                  // Xử lý sự kiện khi nhấn nút
                },
                style: ElevatedButton.styleFrom(
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(10),
                  ),
                  padding: EdgeInsets.symmetric(horizontal: 20, vertical: 10),
                  backgroundColor: Colors.blue,
                  foregroundColor: Colors.white,
                  textStyle: TextStyle(fontSize: 18),
                  elevation: 5,
                  shadowColor: Colors.grey,
                ),
                child: Text('Liên hệ'),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
