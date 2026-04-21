package com.example.helloworld;

import java.util.Map;

import org.springframework.http.MediaType;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class HelloController {

    @GetMapping(value = "/", produces = MediaType.TEXT_HTML_VALUE)
    public String helloPage() {
        return """
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset=\"UTF-8\" />
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
                    <title>Hello-World Service</title>
                    <style>
                        body {
                            margin: 0;
                            min-height: 100vh;
                            display: grid;
                            place-items: center;
                            font-family: Segoe UI, sans-serif;
                            background: linear-gradient(135deg, #f9fafb, #e5e7eb);
                        }
                        .card {
                            padding: 2rem 2.5rem;
                            border-radius: 14px;
                            background: white;
                            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
                            text-align: center;
                        }
                        h1 {
                            margin: 0;
                            color: #0f172a;
                            letter-spacing: 0.03em;
                        }
                        p {
                            margin-top: 0.8rem;
                            color: #334155;
                        }
                    </style>
                </head>
                <body>
                    <div class=\"card\">
                        <h1>Hello-World</h1>
                        <p>Welcome to your first Spring Boot webpage service.</p>
                    </div>
                </body>
                </html>
                """;
    }

    @GetMapping("/api/hello")
    public Map<String, String> helloApi() {
        return Map.of("message", "Hello-World");
    }
}
