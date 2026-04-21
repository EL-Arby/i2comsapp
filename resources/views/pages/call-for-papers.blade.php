@extends('base')

@section('title', 'Call for Papers')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24 bg-white">
    <div class="max-w-5xl mx-auto">
        <!-- Header Section -->
        <div class="mb-16">
            <h1 class="text-6xl font-black tracking-tighter mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Call for Papers</h1>
            <p class="text-xl text-gray-600 font-medium max-w-3xl">
                Submit your abstracts and research papers related to AI, digital transformation, ethics, and practical applications in developing nations.
            </p>
        </div>

        <!-- Important Dates -->
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-8 rounded-xl border border-blue-200">
                <h3 class="font-bold text-blue-600 text-sm uppercase tracking-widest mb-2">Abstract Deadline</h3>
                <p class="text-2xl font-bold text-blue-900">August 31, 2026</p>
            </div>
            <div class="bg-gradient-to-br from-purple-50 to-cyan-50 p-8 rounded-xl border border-purple-200">
                <h3 class="font-bold text-purple-600 text-sm uppercase tracking-widest mb-2">Full Paper Deadline</h3>
                <p class="text-2xl font-bold text-purple-900">October 15, 2026</p>
            </div>
            <div class="bg-gradient-to-br from-cyan-50 to-blue-50 p-8 rounded-xl border border-cyan-300">
                <h3 class="font-bold text-cyan-600 text-sm uppercase tracking-widest mb-2">Notification of Acceptance</h3>
                <p class="text-2xl font-bold text-cyan-900">November 15, 2026</p>
            </div>
        </div>

        <!-- Download Call for Papers Brochure -->
        <div class="mb-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 text-center text-white shadow-lg">
            <h3 class="text-2xl font-bold mb-3">📑 Download Conference Brochure</h3>
            <p class="mb-6 text-blue-50">Get the complete Call for Papers brochure with all information about the conference</p>
            <a href="{{ asset('storage/I2comsapp2024_Call4Papers.pdf') }}" 
       download
       class="inline-block bg-white text-blue-600 px-8 py-3 rounded-xl font-bold hover:shadow-lg transition-all">
        📥 Download Brochure
    </a>
        </div>

        {{-- <!-- Topics -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-blue-900 mb-6">Conference Topics</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="bg-white p-6 rounded-lg border-l-4 border-blue-600">
                    <h3 class="font-bold text-blue-900 mb-2">🤖 Machine Learning & AI Applications</h3>
                    <p class="text-gray-600 text-sm">Deep learning, neural networks, and practical AI implementations</p>
                </div>
                <div class="bg-white p-6 rounded-lg border-l-4 border-purple-600">
                    <h3 class="font-bold text-purple-900 mb-2">🌍 Digital Transformation</h3>
                    <p class="text-gray-600 text-sm">AI-driven innovation in developing economies</p>
                </div>
                <div class="bg-white p-6 rounded-lg border-l-4 border-cyan-500">
                    <h3 class="font-bold text-cyan-900 mb-2">⚖️ AI Ethics & Governance</h3>
                    <p class="text-gray-600 text-sm">Responsible AI, bias mitigation, and regulatory frameworks</p>
                </div>
                <div class="bg-white p-6 rounded-lg border-l-4 border-blue-600">
                    <h3 class="font-bold text-blue-900 mb-2">💼 Industry Solutions</h3>
                    <p class="text-gray-600 text-sm">Real-world AI implementations across sectors</p>
                </div>
            </div>
        </div> --}}

        <!-- Submission Form -->
        <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-12 rounded-2xl border border-blue-200 mb-12">
            <h2 class="text-3xl font-bold text-blue-900 mb-8">Submit Your Paper</h2>
            <form action="{{ route('paper.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid md:grid-cols-2 gap-6">
                    <input type="text" name="author_name" placeholder="Author Name" required class="rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="email" name="email" placeholder="Email" required class="rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                
                <input type="text" name="paper_title" placeholder="Paper Title" required class="w-full rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                
                <div class="grid md:grid-cols-2 gap-6">
                    <input type="text" name="keywords" placeholder="Keywords (comma separated)" class="rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <select name="topic_id" required class="rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700">
                        <option>Select Topic</option>
                        <option>Machine Learning & AI</option>
                        <option>Digital Transformation</option>
                        <option>AI Ethics</option>
                        <option>Industry Solutions</option>
                    </select>
                </div>

                <textarea name="abstract" rows="6" placeholder="Abstract (150-250 words)" required class="w-full rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"></textarea>

                <div class="border-2 border-dashed border-blue-300 rounded-lg p-6 bg-white">
                    <label class="block text-gray-700 font-bold mb-3">📄 Upload Paper (PDF) *Required</label>
                    <input type="file" name="paper_pdf" accept=".pdf" required class="w-full rounded-lg bg-gray-50 border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="text-sm text-gray-500 mt-2">📌 File must be in PDF format | Max size: 20MB</p>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-xl font-bold hover:shadow-lg transition-all">
                        📤 Submit Paper
                    </button>
                    <a href="{{ route('home') }}" class="bg-white text-blue-600 border border-blue-600 px-8 py-3 rounded-xl font-bold hover:bg-blue-50 transition-all">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <!-- Guidelines -->
        <div class="bg-white">
            <h2 class="text-3xl font-bold text-blue-900 mb-6">Submission Guidelines</h2>
            <div class="space-y-4 text-gray-600">
                <p>📝 <strong>Format:</strong> PDF or Word document (max 8 pages)</p>
                <p>📎 <strong>Font:</strong> Times New Roman, 12pt, 1.5 line spacing</p>
                <p>🏷️ <strong>Language:</strong> English (abstracts welcome in French or Arabic)</p>
                <p>👥 <strong>Authorship:</strong> Maximum 5 authors per paper</p>
                <p>📧 <strong>Correspondence:</strong> Provide email for all co-authors</p>
            </div>
        </div>

        <!-- Download Templates Section -->
        <div class="mt-16 mb-12">
            <h2 class="text-3xl font-bold text-blue-900 mb-8">📥 Download Paper Templates</h2>
            
            <div class="bg-gradient-to-br from-blue-50 via-purple-50 to-cyan-50 p-10 rounded-2xl border-2 border-blue-300 mb-8">
                <h3 class="text-2xl font-bold text-blue-900 mb-6">📋 Available Templates Coming Soon</h3>
                <p class="text-gray-700 mb-8">Template files will be uploaded shortly. All papers must be formatted according to Springer LNNS guidelines.</p>
                
                <div class="bg-yellow-100 border-l-4 border-yellow-500 p-6 rounded-lg mb-8">
                    <p class="text-yellow-900 font-bold mb-2">⏳ Templates Under Preparation</p>
                    <p class="text-yellow-800">We are preparing professional Word and LaTeX templates. Please check back soon or contact us for template information:</p>
                    <p class="text-yellow-800 mt-3"><strong>Email:</strong> i2comsapp2026@email.com</p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Word Template -->
                    <div class="bg-white p-6 rounded-xl border-2 border-blue-300">
                        <div class="text-4xl mb-4">📄</div>
                        <h4 class="text-xl font-bold text-blue-900 mb-3">Word Template</h4>
                        <p class="text-gray-600 text-sm mb-4">Microsoft Word format (.docx) - Ready to use template with formatting</p>
                        <button class="inline-block bg-gray-400 text-white px-6 py-3 rounded-lg font-bold cursor-not-allowed" disabled>
                            ⏳ Coming Soon
                        </button>
                    </div>

                    <!-- LaTeX Template -->
                    <div class="bg-white p-6 rounded-xl border-2 border-purple-300">
                        <div class="text-4xl mb-4">🔧</div>
                        <h4 class="text-xl font-bold text-purple-900 mb-3">LaTeX Template</h4>
                        <p class="text-gray-600 text-sm mb-4">LaTeX source files (.tex) - For researchers preferring LaTeX</p>
                        <button class="inline-block bg-gray-400 text-white px-6 py-3 rounded-lg font-bold cursor-not-allowed" disabled>
                            ⏳ Coming Soon
                        </button>
                    </div>

                    <!-- PDF Sample -->
                    <div class="bg-white p-6 rounded-xl border-2 border-cyan-300">
                        <div class="text-4xl mb-4">📋</div>
                        <h4 class="text-xl font-bold text-cyan-900 mb-3">Sample Format Document</h4>
                        <p class="text-gray-600 text-sm mb-4">PDF example showing the expected paper format and layout</p>
                        <button class="inline-block bg-gray-400 text-white px-6 py-3 rounded-lg font-bold cursor-not-allowed" disabled>
                            ⏳ Coming Soon
                        </button>
                    </div>
                </div>
            </div>

            <!-- Springer LNNS Guidelines -->
            <div class="bg-blue-50 border-l-4 border-blue-600 p-8 rounded-lg mb-12">
                <h4 class="text-xl font-bold text-blue-900 mb-4">📖 Springer LNNS Formatting Guidelines</h4>
                <p class="text-gray-700 mb-4">While templates are being prepared, please follow these Springer LNNS guidelines:</p>
                <ul class="text-gray-700 space-y-2 ml-4">
                    <li>✓ <strong>Format:</strong> A4 page size, 2.5 cm margins on all sides</li>
                    <li>✓ <strong>Font:</strong> Times New Roman or similar serif font, 10pt body text</li>
                    <li>✓ <strong>Spacing:</strong> Single line spacing in main text</li>
                    <li>✓ <strong>Length:</strong> 8-15 pages including references</li>
                    <li>✓ <strong>Columns:</strong> Single column layout</li>
                    <li>✓ <strong>References:</strong> Harvard or IEEE citation style</li>
                    <li>✓ <strong>Output:</strong> Submit in PDF format only</li>
                </ul>
                <p class="text-gray-700 mt-4"><strong>Official Springer LNNS Info:</strong> <a href="https://www.springer.com/series/15179" target="_blank" class="text-blue-600 hover:underline">Visit Springer LNNS Series</a></p>
            </div>
        </div>

        <!-- Submission Instructions -->
        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-lg mb-12">
            <h3 class="text-xl font-bold text-yellow-900 mb-3">⚠️ Important Submission Notes</h3>
            <ul class="text-gray-700 space-y-2">
                <li>✓ Papers must be submitted in <strong>PDF format</strong></li>
                <li>✓ Use either Word or LaTeX template provided above</li>
                <li>✓ Ensure your paper follows the <strong>Springer LNNS formatting guidelines</strong></li>
                <li>✓ Include a <strong>completed title page</strong> with authors' information</li>
                <li>✓ Submit through EasyChair or email to: <strong>i2comsapp2026@email.com</strong></li>
                <li>✓ Late submissions may not be accepted</li>
            </ul>
        </div>
    </div>
</main>
@endsection


